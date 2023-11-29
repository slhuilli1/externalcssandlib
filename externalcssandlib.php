<?php
	defined('_JEXEC') or die('Access deny');

	class plgContentExternalcssandlib extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){	
			$a=array();
			//Traitement de l'ajout des JS "externes" => CA MARCHE
			foreach ($this->params->get("externaljs") as $JS)
			{
				$a=(array)$JS;
				
				$document = JFactory::getDocument();				
				//Intégration des bibliothèques JS : CA MARCHE !!
				if (strtolower(substr($a["external-js"],-2))== 'js')
				{
					$document->addScript( $a["external-js"]);
				}

					
			}
			//Integration des fichiers CSS	
			
			
			foreach ($this->params->get("externalcss") as $CSS)
			{	
				if (strtolower(substr($CSS->externalcss,-3))== 'css')
				{
					echo "Fichier css : ".$CSS->externalcss;
					$document->addStyleSheet($CSS->externalcss);
				}			
			}
		}	
	}