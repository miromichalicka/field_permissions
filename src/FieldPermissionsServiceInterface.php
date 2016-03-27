<?php

/**
 * @file
 * Contains FieldPermissionsServiceInterface.php.
 */

namespace Drupal\field_permissions;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\field\FieldStorageConfigInterface;

interface FieldPermissionsServiceInterface {

  /**
   * Obtain the list of field permissions.
   *
   * @param string $field_label
   *   The human readable name of the field to use when constructing permission
   *   names. Usually this will be derived from one or more of the field
   *   instance labels.
   */
  public static function getList($field_label = '');

  /**
   * {@inheritdoc}
   */
  public static function getFieldAccess($operation, FieldItemListInterface $items, AccountInterface $account, FieldDefinitionInterface $field_definition);

  /**
   * Returns field permissions in format suitable for use in hook_permission.
   *
   * @param \Drupal\field\FieldStorageConfigInterface $field
   *   The field to return permissions for.
   *
   * @return array
   *   An array of permission information,
   */
  public function listFieldPermissionSupport(FieldStorageConfigInterface $field, $label = '');

  /**
   * Get default value for checkbox  role permission.
   *
   * @param \Drupal\field\FieldStorageConfigInterface $field
   *   The field to return permissions for.
   */
  public static function getPermissionValue(FieldStorageConfigInterface $field);

  /**
   * Returns permissions.
   */
  public function permissions();

  /**
   * {@inheritdoc}
   */
  public static function fieldGetPermissionType(FieldStorageConfigInterface $field);

  /**
   * @param String $field_name
   * @return mixed
   */
  public function fieldGetPermissionTypeByName($field_name);

}
