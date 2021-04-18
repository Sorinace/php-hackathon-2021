<?php
/**
 * @param string $program_nou
 * @return boolean
 */
function overlaping($program_new, $program) {
  if ($program_new->getRoomName() == $program->getRoomName()) {
      // if have the same room check the schedule
      if (($program_new->getEnd() <= $program->getStart()) || ($program_new->getStart() >= $program->getEnd())) {
        return false;
      } else {
        return true;
      }
    }
  return false;
}

?>