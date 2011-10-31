<?php
App::uses('AppModel', 'Model');
/**
 * Blog Model
 *
 */
class Blog extends AppModel {
/**
 * Display field
 *
 * @var string
 */
    public $order        = 'Blog.id DESC';
	public $displayField = 'name';
}
