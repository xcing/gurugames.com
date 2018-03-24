<?php

class MOLCDbAuthManager extends CDbAuthManager {

    public $connectionID = 'db';

    /**
     * @var string the name of the table storing authorization items. Defaults to 'AuthItem'.
     */
    //public $itemTable = 'rights_authitem';

    /**
     * @var string the name of the table storing authorization item hierarchy. Defaults to 'AuthItemChild'.
     */
   // public $itemChildTable = 'rights_authitemchild';

    /**
     * @var string the name of the table storing authorization item assignments. Defaults to 'AuthAssignment'.
     */
   // public $assignmentTable = 'rights_authassignment';

}