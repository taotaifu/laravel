<?php
namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine whether the user can view the model.
	 *
	 * @param  \App\User  $user
	 * @param  \App\User  $model
	 * @return mixed
	 */
	//参数($user为当前登录用户，$model为传递进来的模型)
	public function view(User $user, User $model)
	{
		//dd($model);
		//检测当前登录用户是否为管理员
		return $user->is_admin == 1;
	}

	/**
	 * Determine whether the user can create models.
	 *
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
		//
	}

	/**
	 * Determine whether the user can update the model.
	 *
	 * @param  \App\User  $user
	 * @param  \App\User  $model
	 * @return mixed
	 */
	public function update(User $user, User $model)
	{
		//
	}

	/**
	 * Determine whether the user can delete the model.
	 *
	 * @param  \App\User  $user
	 * @param  \App\User  $model
	 * @return mixed
	 */
	public function delete(User $user, User $model)
	{
		//
	}

	/**
	 * Determine whether the user can restore the model.
	 *
	 * @param  \App\User  $user
	 * @param  \App\User  $model
	 * @return mixed
	 */
	public function restore(User $user, User $model)
	{
		//
	}

	/**
	 * Determine whether the user can permanently delete the model.
	 *
	 * @param  \App\User  $user
	 * @param  \App\User  $model
	 * @return mixed
	 */
	public function forceDelete(User $user, User $model)
	{
		//
	}

	public function isMine(User $user,User $model){
		     //$user  为当前查看文章的作者
		     //$model 为当前登录的用户
           //dump ($model);
           //dd ($user);
		//如果当前查看文章的作者的id 等于 当前登录用户的id 代表着是自己查看自己
		//可以修改自己的名字 跟密码 头像
		return $user->id == $model->id;

	}
}
