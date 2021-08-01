<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    	<li class="nav-devider"></li>
                        <?=Menu::widget([
			['label' => 'Dashboard', 'level' => 1, 'url' => ['/site/index'], 'icon' => 'mdi mdi-gauge', 'children' => []],
			
			['label' => 'WEBSITE', 'level' => 0],
                            
            ['label' => 'Introduction', 'level' => 1, 'url' => ['/website/introduction/index'], 'icon' => 'mdi mdi-file-check', 'children' => []],
                            
             ['label' => 'Section', 'level' => 1, 'url' => ['/website/section/index'], 'icon' => 'mdi mdi-currency-usd', 'children' => []],
                            
          ['label' => 'Portfolio', 'level' => 1, 'url' => ['/website/portfolio/index'], 'icon' => 'mdi mdi-credit-card', 'children' => []],

				
	
			
			
			
	/* 		['label' => 'Reports', 'level' => 2 , 'icon' => 'mdi mdi-currency-usd', 'children' => [
				['label' => 'Chart of Account', 'url' => ['/account/chart'], 'icon' => 'fa fa-plus'],
				['label' => 'Income Statement', 'url' => ['/account/income-statement'], 'icon' => 'fa fa-list'],
				['label' => 'Financial Position', 'url' => ['/account/financial-position'], 'icon' => 'fa fa-list'],
			
			]], */
			
			['label' => 'CLIENTS', 'level' => 0],
			['label' => 'Clients', 'level' => 1 , 'url' => ['/client/client/index'], 'icon' => 'mdi mdi-account-check'],

			['label' => 'EXPERTS', 'level' => 0],
			['label' => 'Experts',  'level' => 1 , 'url' => ['/staff/staff/index'], 'icon' => 'mdi mdi-account-box'],
			
			
			['label' => 'OTHERS', 'level' => 0],
			
			['label' => 'General Setting', 'level' => 1,'url' => ['/setting/update', 'id' => 1], 'icon' => 'mdi mdi-settings-box'],
			
			[
                'label' => 'User Management',
                'level' => 2,
                'icon' => 'mdi mdi-account-multiple',
                'children' => [
				
					['label' => 'User List', 'icon' => 'user', 'url' => ['/user/index'],],
					
					['label' => 'User Assignment', 'icon' => 'user', 'url' => ['/admin'],],
				
                    ['label' => 'User Role List', 'icon' => 'user', 'url' => ['/admin/role'],],
					
					['label' => 'Route List', 'icon' => 'user', 'url' => ['/admin/route'],],

                ],
            ],
			
		
		]
	
	)?>
                       
                    </ul>
                </nav>