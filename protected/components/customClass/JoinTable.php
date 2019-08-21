<?php
       
class JoinTable {
    //organization types
    public function  joinOrganizationTypes($id){
        $model= TOrganizationtype::model()->findByPk($id);
        if($model === NULL){
//            LOG errors and redirect
        }else{
            return $model;
        }
    }
    
    //countries
    public function  joinCountry($id){
        $model= TCountry::model()->findByAttributes(array('code'=>$id));
        if($model === NULL){
//            LOG errors and redirect
        }else{
            return $model;   
        }
    }
    
    
    public  function organizationCitationMapping($id) {
        
	$sql = 'SELECT '
            . 't1.citation AS citation,'                            
            . 't1.research AS research_id,'                            
            . 't2.name AS research_name '
            . 'FROM t_organizationcitation_mapping t1 '
            . 'JOIN t_organizationresearch t2 ON t1.research = t2.id '
            . 'WHERE t1.citation = '.$id.' ORDER BY t1.research'; 
        $mappingData = Yii::app()->db->createCommand($sql)->queryAll();
        return $mappingData;
    }
    
   
}