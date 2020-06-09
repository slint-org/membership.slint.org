<?php

namespace Drupal\webform_hierarchy\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for webform hierarchy plugins.
 */
interface WebformHierarchyInterface extends PluginInspectionInterface {

  /**
   * Returns the widget items.
   *
   * @return array
   *   The widget items.
   */
  public function items($widget_name, $parent_value, $langcode);

  /**
   * Returns the hierarchy status.
   *
   * @return bool
   *   TRUE if the hierarchy should be available in webform build UI.
   */
  public function isEnabled();

}
