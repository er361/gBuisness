<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DbSeedController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @return int Exit code
     * @throws \Exception
     */
    public function actionIndex()
    {
        $seeder = new \tebazil\yii2seeder\Seeder();
        $generator = $seeder->getGeneratorConfigurator();
        $faker = $generator->getFakerConfigurator();

        $seeder->table('authors')->columns([
            'id', //automatic pk
            'name_or_pseudo' => $faker->firstName, //automatic fk
            'birth_year' => $faker->numberBetween(1500, 2019),
            'rating' => $faker->randomFloat(2,0,5)
        ])->rowQuantity(30);

        $seeder->table('books')->columns([
            'id',
            'author_id' => $faker->numberBetween(1,30),
            'author_name' => $faker->firstName,
            'publish_year' => $faker->numberBetween(1900, 2019),
            'titles' => $faker->title,
            'rating' => $faker->randomFloat(2,0,5)
        ])->rowQuantity(250);

        $seeder->refill();

        return ExitCode::OK;
    }
}
