<?php

namespace frontend\controllers;
use app\models\Cities;
use app\models\Ing;
use frontend\models\Articles;
use app\models\Authors;
use app\models\Books;
use yii\base\Security;
use yii\db\Query;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\web\Controller;
use Yii;
use yii\widgets\Pjax;
use yii\data\Pagination;
use app\models\Blud;

class ArticlesController extends Controller
{
    public function actionArticles()
    {
//        $articles = Articles::find()->all();
        $query = Articles::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('articles',[
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }

    public function actionArticle()
    {
        $article = Articles::find()->where(['id' => Yii::$app->request->get()['id']])->one();
//        var_dump($article->getImg());
//         die;
//        var_dump(__DIR__);die;
//        echo $article->getImg(); die;
        $article->hits += 1;
        $article->save(false);
        return $this->render('article',[
            'article' => $article,
        ]);
    }

    public function actionNew()
    {
        $model = new Articles();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            $img = UploadedFile::getInstance($model,'alias');
            $model->alias = $model->saveImg($model,$img);
            $model->save();
            return $this->redirect(['/articles/article', 'id' => $model->id]);
        }
        return $this->render('new',['model' => $model]);
    }

    public function actionEdit()
    {
        $model = Articles::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        if (Yii::$app->request->isPost and $model->load(Yii::$app->request->post()))
        {
            $img = UploadedFile::getInstance($model,'alias');
            $model->alias = $model->saveImg($model,$img);
            $model->save();
            return $this->redirect(['/articles/article', 'id' => $model->id]);
        }
        return $this->render('edit',['model'=> $model]);
    }

    public function actionActiverecord()
    {
//        $model = Articles::find()->select(['text','hits'])->orderBy(['id' => SORT_DESC])->all();
//        $model = Articles::findOne(['id' => 3]);
        $model = Articles::findBySql('SELECT * FROM articles')->all();
           /*$model = new Articles();
           $model->id = 15;
            $model->title = 'Some title';
           $model->text = 'SOme text';
           $model->author_id = 20;
            $model->alias = null;
           $model->date = date('Y-m-d');
            $model->likes = 17;
           $model->hits = 100;
            $model->save();
           echo '<pre>';
            print_r($model); die;*/
        if ($modeldel = Articles::findOne(15))
        {
            $modeldel->delete();
        }
        return $this->render('ar',['model' => $model]);
    }

    public function actionLinks()
    {
        $query = new Query();
        $query->select('*')
            ->from('books_and_authors')
            ->leftJoin('books','books_and_authors.book_id = books.id');
        $command = $query->createCommand();
        $res = $command->queryAll();
//        echo '<pre>';
//        print_r($res);
        return $this->render('links',['res' => $res]);
    }

    public function actionPjax()
    {
        $security = new Security();
        $string = Yii::$app->request->post('string');
        $stringHash = '';
        if (!is_null($string)) {
            $stringHash = $security->generatePasswordHash($string);
        }
        return $this->render('pjax', [
            'stringHash' => $stringHash,
        ]);
    }

    public function actionHtml()
    {
        $article = Articles::findOne(1);
        $tag = Html::tag('h2',$article->id.' - '.$article->title);
        return $this->render('html',[
            'article' => $article,
            'tag' => $tag
        ]);
    }

    public function actionNewbook()
    {
        $model = new Books();
        if (Yii::$app->request->isPost and isset(Yii::$app->request->post()['send']))
        {
            echo '<pre>';
            var_dump($model->attributes);
            var_dump($model->attributes(Yii::$app->request->post())); die;
            if($model->load(Yii::$app->request->post()))
            {
                $model->save();
                echo 'Данные загружены'; die;
            }
        }
        return $this->render('newbook',[
            'model' => $model
        ]);
    }

    public function actionRelations()
    {
        echo '<pre>';
        $city = Cities::findOne(1)->getStreets()->all();
        foreach ($city as $obj)
        {
            echo $obj->street.'<br>';
        }
    }

    public function actionFoods()
    {
        echo '<pre>';
        $ing = Blud::find()->one();
        $blud = $ing->getIngbluds()->with('ing')->asArray()->all();
        echo $ing->name.'<hr>';
//        print_r($blud);
        foreach($blud as $one)
        {
            echo $one['ing']['name'].'<br>';
        }
        die;
        print_r($ing);
        echo '<hr>';
        print_r($blud);
        die;
    }

}