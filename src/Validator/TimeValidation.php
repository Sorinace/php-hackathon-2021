<?php
/******************************************************************************/
/****                         Validatori de timp                           ****/
/******************************************************************************/
/**
 *
 * @param string $program_nou
 * @return boolean
 */
function overlapingFree($program, $programs) {
  foreach ($programs as $item) {
    if ($program->getRoomName() == $item->getRoomName()){
      if ($program->getStart->format('m/d/Y') == $item->getStart->format('m/d/Y')){
        return true;
      }
    }

  }
  return false;
}

?>