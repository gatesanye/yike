<?php
namespace View;

/**
 * 信息相关视图
 * 
 * @author gatesanye<gatesanye@gmail.com>
 *
 */
class Message
{
	public static $msgModal = <<<Modal
	<div class="modal hide fade" id="msgmodal">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>发送消息</h3>
		</div>
		
		<div class="modal-body">

		</div>
		<div class="modal-footer">

		</div>		
	</div>
Modal;
	
	/**
	 * 
	 * Enter description here ...
	 * @param string $id
	 * @param string $title
	 * @param string $body
	 * @param string $footer
	 * @return string
	 */
	public static function getMsgModal($id='', $title='', $body='', $footer='')
	{
		return <<<Modal
	<div class="modal hide fade" id="{$id}">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>{$title}</h3>
		</div>
		
		<div class="modal-body" id="{$id}_body">
			{$body}
		</div>
		<div class="modal-footer" id="{$id}_footer">
			{$footer}
		</div>		
	</div>
Modal;
	}
}