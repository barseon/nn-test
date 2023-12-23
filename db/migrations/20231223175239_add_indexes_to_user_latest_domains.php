<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddIndexesToUserLatestDomains extends AbstractMigration
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
        $table = $this->table('UserLatestDomains');
        $table->addIndex(['user_id'], ['name' => 'idx_latest_domain_user'])
            ->addIndex(['category_id'], ['name' => 'idx_latest_domain_category'])
            ->addIndex(['last_updated'], ['name' => 'idx_latest_domain_last_updated'])
            ->update();
    }
}
