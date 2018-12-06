<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HdModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hd_module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '自定义的命令';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	//扫描出app/http/Controlles中所有的文件
          $modules=glob ('app/http/Controllers/*');

          foreach ($modules as $module){

			  if (is_dir ($module .'/System')){
                //获取整个路径的最后一部分
                $moduleName=basename($module);
				  //dd ($moduleName);die;
                //获取module中的中文名称
				  $config = include $module . '/System/config.php';
				  //dd ($config);die;
                //获取权限
				  //$permissions = include $module . '/System/permission.php';
				  $permissions = include $module . '/System/permission.php';
				  //dd ($permissions);die;
                //将模块数据写入modules数据表
				  Module::firstOrNew(['name'=>$moduleName])->fill(['title'=>$config['app'],'permissions'=>$permissions])->save();
				  //dd($permissions);
                //将权限写入permissions权限表中
				  foreach ($permissions as $permission){
				 Permission::firstOrNew(['name'=>$moduleName.'-'.$permission['name']])->fill(['title'=>$permission['title'],'module'=>$moduleName])->save();
					  //dd($permissions);

				  }
			  }


		  }


		//站长角色
		$role=Role::where('name','webmaster')->first();
          //dd($role);
         //获取所有权限
		$permissions=Permission::pluck('name');
		//dd ($permissions);
		//给角色同步权限
        $role->syncPermissions($permissions);
        //获取设置为站长的用户
		$user=User::find(1);
		//dd ($user);
		//给用户同步权限
		$user->assignRole('webmaster');
		//清除权限缓存
		app()['cache']->forget('spatie.permission.cache');
		//命令执行成功提示信息
		$this->info('permission init successfully');

    }
}
