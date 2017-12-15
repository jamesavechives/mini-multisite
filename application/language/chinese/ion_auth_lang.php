<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']            = '账号创建成功';
$lang['account_creation_unsuccessful']          = '无法创建账号';
$lang['account_creation_duplicate_email']       = '邮箱被占用或者不合法';
$lang['account_creation_duplicate_identity']    = 'ID被占用或者不合法';
$lang['account_creation_missing_default_group'] = '未设置默认分组';
$lang['account_creation_invalid_default_group'] = '默认分组名称不合法';


// Password
$lang['password_change_successful']          = '密码修改成功';
$lang['password_change_unsuccessful']        = '无法修改密码';
$lang['forgot_password_successful']          = '已发送密码重置邮件';
$lang['forgot_password_unsuccessful']        = '不能发送密码重置邮件';

// Activation
$lang['activate_successful']                 = '账号已激活';
$lang['activate_unsuccessful']               = '无法激活账号';
$lang['deactivate_successful']               = '账号已停用';
$lang['deactivate_unsuccessful']             = '无法停用账号';
$lang['activation_email_successful']         = '激活账号邮件已发送。请检查收件箱或者垃圾箱';
$lang['activation_email_unsuccessful']       = '无法发送激活账号邮件';
$lang['deactivate_current_user_unsuccessful']= '无法停用自己的账号.';

// Login / Logout
$lang['login_successful']                    = '登陆成功';
$lang['login_unsuccessful']                  = '登陆错误';
$lang['login_unsuccessful_not_active']       = '账号停用';
$lang['login_timeout']                       = '暂时锁定账号。请稍后重试。';
$lang['logout_successful']                   = '登出成功';

// Account Changes
$lang['update_successful']                   = '账号信息更新成功';
$lang['update_unsuccessful']                 = '无法更新账号信息';
$lang['delete_successful']                   = '用户已被删除';
$lang['delete_unsuccessful']                 = '无法删除用户';

// Groups
$lang['group_creation_successful']           = 'Group created Successfully';
$lang['group_already_exists']                = 'Group name already taken';
$lang['group_update_successful']             = 'Group details updated';
$lang['group_delete_successful']             = 'Group deleted';
$lang['group_delete_unsuccessful']           = 'Unable to delete group';
$lang['group_delete_notallowed']             = 'Can\'t delete the administrators\' group';
$lang['group_name_required']                 = 'Group name is a required field';
$lang['group_name_admin_not_alter']          = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = '账号激活';
$lang['email_activate_heading']              = '用于 %s 的账号激活';
$lang['email_activate_subheading']           = '请点击该链接到 %s.';
$lang['email_activate_link']                 = '激活你的账号';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = '忘记密码验证';
$lang['email_forgot_password_heading']       = '为 %s 重置密码';
$lang['email_forgot_password_subheading']    = '请点击该链接到 %s.';
$lang['email_forgot_password_link']          = '重置密码';

// New Password Email
$lang['email_new_password_subject']          = '新密码';
$lang['email_new_password_heading']          = '%s的新密码';
$lang['email_new_password_subheading']       = '你的新密码已经被设置到: %s';
