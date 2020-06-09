<?php

namespace Drupal\webform_alias_container\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\WebformSubmissionInterface;
use Drupal\webform\Plugin\WebformElement\WebformCustomComposite;
use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\Plugin\WebformElement\Container;

/**
 * Provides an aliased container for custom composite element.
 *
 * @WebformElement(
 *   id = "webform_aliased_container",
 *   label = @Translation("Custom aliased container"),
 *   description = @Translation("Provides a form container element to hold composites"),
 *   category = @Translation("Containers"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 */
class WebformAliasedContainer extends Container { 
  /****************************************************************************/
  // Operation methods.
  /****************************************************************************/
  
  /**
   * {@inheritdoc}
   */
  public function postLoad(array &$element, WebformSubmissionInterface $webform_submission) {
    $webform=$webform_submission->getWebform();
    $data=$webform_submission->getData();
    if ($data && is_array($element['#webform_children'])) {
      $children=array_values($element['#webform_children']);
      if($children) {
        $primary=array_shift($children);
        $primary_element=$webform->getElement($primary);
        foreach ($children as $child) {
          $child_element=$webform->getElement($child);
          if (isset($data[$primary])) {
            if ($child_element['#webform_multiple']==$primary_element['#webform_multiple']) {
              $data[$child]=$data[$primary];
            } elseif ($child_element['#webform_multiple']) {
              $data[$child][0]=$data[$primary];
            } else {
              if (isset($data[$primary][0])) {
                $data[$child]=$data[$primary][0];
              }
            }
          }
        }
        $webform_submission->setData($data);
      }
    }
  }
  
  /**
   * {@inheritdoc}
   */
  public function preSave(array &$element, WebformSubmissionInterface $webform_submission) {
    $webform=$webform_submission->getWebform();
    if (is_array($element['#webform_children'])) {
      $children=array_values($element['#webform_children']);
      if($children) {
        $data=$webform_submission->getData();
        $primary=array_shift($children);
        $primary_element=$webform->getElement($primary);
        foreach ($children as $child) {
          if ($data[$child]) {
            $child_element=$webform->getElement($child);
            if ($child_element['#webform_multiple']==$primary_element['#webform_multiple']) {
              $data[$primary]=$data[$child];
            } elseif ($primary_element['#webform_multiple']) {
              $data[$primary][0]=$data[$child];
            } else {
              $data[$primary]=$data[$child][0];
              if (count($child)>1) {
                \Drupal::messenger()->addError('WebformAliasedContainer: Only saved first entry');
              }
            }
            unset($data[$child]);
            
            $webform_submission->setData($data);
            break;
          }
        }
      }
    }
  }
  
}
