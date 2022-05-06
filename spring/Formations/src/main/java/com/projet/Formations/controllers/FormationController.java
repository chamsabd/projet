package com.projet.Formations.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.projet.Formations.entities.Formation;
import com.projet.Formations.service.FormationService;

@Controller
public class FormationController {
	@Autowired
	FormationService FormationService;
	
	@RequestMapping("/ListeFormations") 
	public String listeFormations( 
	ModelMap modelMap, 
	@RequestParam(name = "page", defaultValue = "0") int page, 
	@RequestParam(name = "size", defaultValue = "5") int size,
	@RequestParam(name = "nom", defaultValue = "") String nom) 
	{
		if(nom=="") {
	 Page<Formation> prods = FormationService.getAllFormationsparpage(page, size); 
	 List<Formation> prod = FormationService.getAllFormations(); 
	 modelMap.addAttribute("scFormations", prod);
	modelMap.addAttribute("Formations", prods); 

	modelMap.addAttribute("pages", new int[prods.getTotalPages()]); 
	modelMap.addAttribute("currentPage", page); }
		else {
//			 
			Page<Formation> prods = FormationService.findByNomFormationContains(nom, PageRequest.of(page, size).toOptional().get());

			 List<Formation> prod = FormationService.getAllFormations(); 
			 modelMap.addAttribute("scFormations", prod);
			modelMap.addAttribute("Formations", prods); 
			modelMap.addAttribute("pages", new int[prods.getTotalPages()]); 
			modelMap.addAttribute("currentPage", page);
			modelMap.addAttribute("nom", nom);
		}
	return "ListeFormations"; 
	}
}
