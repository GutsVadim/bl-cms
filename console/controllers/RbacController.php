<?php

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class RbacController {
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавл€ем разрешение "createPost"
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // добавл€ем разрешение "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // добавл€ем роль "author" и даЄм роли разрешение "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // добавл€ем роль "admin" и даЄм роли разрешение "updatePost"
        // а также все разрешени€ роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Ќазначение ролей пользовател€м. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}