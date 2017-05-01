1.
Line 59 of the file app/code/core/Mage/Install/Model/Installer/Db/Mysql4.php

Replace:

public function supportEngine()
    {
        $variables  = $this->_getConnection()
            ->fetchPairs('SHOW VARIABLES');
        return (!isset($variables['have_innodb']) || $variables['have_innodb'] != 'YES') ? false : true;
    }
with this:

public function supportEngine()
    {
        $variables  = $this->_getConnection()
            ->fetchPairs('SHOW ENGINES');
        return (isset($variables['InnoDB']) && $variables['InnoDB'] != 'NO');
    }

or if not get mysql file	
	
2.  Find the 	have_innodb and remove that function ........
+1 yep, MySQL 5.6 removed the have_innodb variable