<?php
class ZFB_Soap
{
    /**
     * Write to a file
     *
     *
     * @return array
     */
    public function getObjednavky() {
        try {
            $result = array('lala'=>'kuku');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
?>