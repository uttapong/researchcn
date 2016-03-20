<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'current_funds-title' => 'Current Funds',
    'current_funds-not_have_fund' => 'There is no availabled funds for apply',
    'current_funds-doc_download' => 'Availabled Documents',
    'current_funds-apply_btn' => 'Apply',
    'current_funds-applied_btn' => 'Applied',
    'current_funds-confirm_apply' => 'Confirm application',

    'recent_funds-not_have' => 'There is no currently application',

    'recent_funds-title' => 'Recent Funds',
    'recent_funds-not_have_fund' => 'No recent fund',

    'form_user_request-state_fund' => 'State Fund',
    'form_user_request-documentation' => 'Documentation',
    'form_user_request-fail' => 'Rejected',
    'form_user_request-old_file' => 'Old files disapproved',
    'form_user_request-error-message' => 'Please insert all required fields',
    'form_user_request-success-message' => 'Document uploaded successfully',
    'form_user_request-submit_btn' => 'Save',

    'applied_funds-title' => 'Applied Funds',
    'applied_funds-not_have' => 'No Application',
    'applied_funds-table' => array(
        'title' => 'Fund Name',
        'step' => 'Application Progress',
        'status' => 'Status',
        'next_step' => 'Proceed to the next step'
    ),

    'manage_funds-title' => 'Manage Funds',
    'manage_funds-not_have' => 'Click "Add New Fund" button to create fund',
    'manage_funds-edit_btn' => 'Edit',
    'manage_funds-delete_btn' => 'Delete',
    'manage_funds-new_fund_btn' => 'Add New Fund',
    'manage_funds-confirm_delete' => 'Confirm deletion',
    'manage_funds-table' => array(
        'title' => 'Fund Name',
        'type' => 'Fund type',
        'start_Apply' => 'Application start',
        'end_apply' => 'Application End'
    ),
    'manage_funds-month_format' => Array("", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"),
    'manage_funds-year_format' => '0',

    'add_funds-title-add' => 'Add New Fund',
    'add_funds-title-edit' => 'Edit Fund',
    'add_funds-sub_title1' => 'Fund Info',
    'add_funds-sub_title2' => 'Fund Duration',
    'add_funds-form1-1' => 'Name',
    'add_funds-form1-2' => 'Type',
    'add_funds-form1-3' => 'Description',
    'add_funds-form1-4' => 'Documents for download',
    'add_funds-select' => 'Please Select',
    'add_funds-form2-1' => 'Start Date Apply',
    'add_funds-form2-2' => 'End Date Apply',
    'add_funds-form2-3' => 'Start document submission date',
    'add_funds-form2-4' => 'End document end date',
    'add_funds-form2-5' => 'Project deadline',
    'add_funds-error-message' => 'Please make sure all required fields are filled out correctly',
    'add_funds-success-message-add' => 'Add new fund success',
    'add_funds-success-message-edit' => 'Edit fund success',
    'add_funds-upload_note' => 'You must submit this form before upload document',
    'add_funds-upload_btn' => 'Upload Documents',
    'add_funds-submit_btn' => 'Save',

    'add_funds_file_uplaod-title' => 'Upload Document',
    'add_funds_file_uplaod-back_btn' => 'Back to Fund Info',

    'applicator_list-title' => 'Select Fund',
    'applicator_list-not_have' => 'No fund found',

    'applicator_user_requesst-not_have' => 'No application avaliabled',
    'applicator_user_requesst-table' => array(
        'title' => 'User Name',
        'step' => 'Request Progress',
        'document' => 'Document',
    )
];
