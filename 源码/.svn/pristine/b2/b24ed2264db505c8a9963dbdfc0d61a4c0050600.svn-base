<?php
namespace View;

/**
 * 用户相关视图
 * 
 * @author gatesanye<gatesanye@gmail.com>
 *
 */
class User
{
	/**
	 * 获取下拉菜单
	 */
	public static function getNavDropdown()
	{
		$user = \Model\User::getCurrentUser();
		$msgCount = \Model\Message::getMsgCount();
		return !$user ? '' :   <<<Dropdown
							<ul class="nav pull-right">
								<li class="dropdown">
									<a href="javacript:;" class="dropdown-toggle" data-toggle="dropdown">{$user->user_name}<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="/app/user/index.php">用户中心</a></li>
										<li><a href="/app/user/index.php#user-msg" id="msgbox" title="你有 {$msgCount} 条未读消息">消息( <b>{$msgCount}</b> )</a></i>										
										<li class="divider"></li>
										<li><a href="/app/unuse/new.php">发表新闲置物品</a></li>
										<li><a href="/app/require/new.php">发表新的需求</a></li>
										<li class="divider"></li>
										<li><a href="javascript:;" id="yike_logout">注销</a></li>
									</ul>
								</li>
							</ul>
Dropdown;
	}
}