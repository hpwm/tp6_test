<?php

use think\migration\db\Column;
use think\migration\Migrator;

class CreateFailedJobsTable extends Migrator
{
    public function change()
    {
        $this->table('failed_jobs')
            ->addColumn(Column::text('connection'))
            ->addColumn(Column::text('queue'))
            ->addColumn(Column::longText('payload'))
            ->addColumn(Column::longText('exception'))
            ->addColumn(Column::timestamp('fail_time')->setDefault('CURRENT_TIMESTAMP'))
            ->create();
    }
}
