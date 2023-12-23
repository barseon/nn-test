<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddIndexesToSessionScores extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('SessionScores');
        $table->addIndex(['user_id'], ['name' => 'idx_session_user'])
            ->addIndex(['course_id'], ['name' => 'idx_session_course'])
            ->addIndex(['exercise_id'], ['name' => 'idx_session_exercise'])
            ->addIndex(['category_id'], ['name' => 'idx_session_category'])
            ->addIndex(['timestamp'], ['name' => 'idx_session_timestamp'])
            ->update();
    }
}
