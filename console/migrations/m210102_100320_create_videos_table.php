<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210102_100320_create_videos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videos}}', [
            // 'id' => $this->primaryKey(),
            'videoId' => $this->string(16)->notNull(),
            'videoName'=>$this->string(512),
            'title' => $this->string(512)->notNull(),
            'description' => $this->text(),
            'tags'=>$this->string(512),
            'hasThumbnail'=>$this->boolean(),
            'status'=>$this->integer(1),
            'created_by' => $this->integer(11),
            'created_at'=>$this->integer(11),
            'updated_at'=>$this->integer(11),
        ]);

        $this->addPrimaryKey( 'PK_videos_videoId','{{%videos}}','videoId');

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-videos-created_by}}',
            '{{%videos}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-videos-created_by}}',
            '{{%videos}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-videos-created_by}}',
            '{{%videos}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-videos-created_by}}',
            '{{%videos}}'
        );

        $this->dropTable('{{%videos}}');
    }
}
