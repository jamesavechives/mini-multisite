<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = '表单没有通过安全检查.';

// Login
$lang['login_heading']         = '登录';
$lang['login_subheading']      = '请在下方输入邮箱和密码进行登陆.';
$lang['login_identity_label']  = '邮箱:';
$lang['login_password_label']  = '密码:';
$lang['login_remember_label']  = '记住我:';
$lang['login_submit_btn']      = '登陆';
$lang['login_forgot_password'] = '忘记密码?';

// Index
$lang['index_heading']           = '用户';
$lang['index_subheading']        = '以下是用户列表.';
$lang['index_fname_th']          = '姓';
$lang['index_lname_th']          = '名';
$lang['index_email_th']          = '邮箱';
$lang['index_groups_th']         = '组别';
$lang['index_status_th']         = '状态';
$lang['index_action_th']         = '操作';
$lang['index_active_link']       = '活动';
$lang['index_inactive_link']     = '未运行';
$lang['index_create_user_link']  = '创建新用户';
$lang['index_create_group_link'] = '创建新分组';

// Deactivate User
$lang['deactivate_heading']                  = '停用用户';
$lang['deactivate_subheading']               = '确定要停用用户吗 \'%s\'';
$lang['deactivate_confirm_y_label']          = '是:';
$lang['deactivate_confirm_n_label']          = '否:';
$lang['deactivate_submit_btn']               = '提交';
$lang['deactivate_validation_confirm_label'] = '确认';
$lang['deactivate_validation_user_id_label'] = '用户 ID';

// Create User
$lang['create_user_heading']                           = '创建用户';
$lang['create_user_subheading']                        = '请在下方输入用户信息.';
$lang['create_user_fname_label']                       = '姓:';
$lang['create_user_lname_label']                       = '名:';
$lang['create_user_company_label']                     = '公司名称:';
$lang['create_user_identity_label']                    = 'ID号码:';
$lang['create_user_email_label']                       = '邮箱:';
$lang['create_user_phone_label']                       = '电话:';
$lang['create_user_password_label']                    = '密码:';
$lang['create_user_password_confirm_label']            = '确认密码:';
$lang['create_user_submit_btn']                        = '创建用户';
$lang['create_user_validation_fname_label']            = '姓';
$lang['create_user_validation_lname_label']            = '名';
$lang['create_user_validation_identity_label']         = 'ID号码';
$lang['create_user_validation_email_label']            = '邮箱地址';
$lang['create_user_validation_phone_label']            = '电话';
$lang['create_user_validation_company_label']          = '公司名称';
$lang['create_user_validation_password_label']         = '密码';
$lang['create_user_validation_password_confirm_label'] = '确认密码';

// Edit User
$lang['edit_user_heading']                           = '编辑用户';
$lang['edit_user_subheading']                        = '请在下方输入用户信息.';
$lang['edit_user_fname_label']                       = '姓:';
$lang['edit_user_lname_label']                       = '名:';
$lang['edit_user_company_label']                     = '公司名称:';
$lang['edit_user_email_label']                       = '邮箱:';
$lang['edit_user_phone_label']                       = '电话';
$lang['edit_user_password_label']                    = '密码: (如果需要修改)';
$lang['edit_user_password_confirm_label']            = '确认密码: (如果需要修改)';
$lang['edit_user_groups_heading']                    = '分组';
$lang['edit_user_submit_btn']                        = '保存用户';
$lang['edit_user_validation_fname_label']            = '姓';
$lang['edit_user_validation_lname_label']            = '名';
$lang['edit_user_validation_email_label']            = '邮箱';
$lang['edit_user_validation_phone_label']            = '电话';
$lang['edit_user_validation_company_label']          = '公司名称';
$lang['edit_user_validation_groups_label']           = '分组';
$lang['edit_user_validation_password_label']         = '密码';
$lang['edit_user_validation_password_confirm_label'] = '确认密码';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = '修改密码';
$lang['change_password_old_password_label']                    = '旧密码:';
$lang['change_password_new_password_label']                    = '新密码 (至少 %s 个字符长度):';
$lang['change_password_new_password_confirm_label']            = '确认新密码:';
$lang['change_password_submit_btn']                            = '修改';
$lang['change_password_validation_old_password_label']         = '旧密码';
$lang['change_password_validation_new_password_label']         = '新密码';
$lang['change_password_validation_new_password_confirm_label'] = '确认新密码';

// Forgot Password
$lang['forgot_password_heading']                 = '忘记密码';
$lang['forgot_password_subheading']              = '请输入您的 %s ，我们可以发送邮件让您重置密码.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = '提交';
$lang['forgot_password_validation_email_label']  = '邮箱地址';
$lang['forgot_password_identity_label'] = 'Identity';
$lang['forgot_password_email_identity_label']    = '邮箱';
$lang['forgot_password_email_not_found']         = '该邮箱没有记录.';
$lang['forgot_password_identity_not_found']         = '该用户名没有记录.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';
