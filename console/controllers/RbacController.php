<?php

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class RbacController {
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // ��������� ���������� "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // ��������� ���������� "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // ��������� ���� "author" � ��� ���� ���������� "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // ��������� ���� "admin" � ��� ���� ���������� "updatePost"
        // � ����� ��� ���������� ���� "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // ���������� ����� �������������. 1 � 2 ��� IDs ������������ IdentityInterface::getId()
        // ������ ����������� � ������ User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}