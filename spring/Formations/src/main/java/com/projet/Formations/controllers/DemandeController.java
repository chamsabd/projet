package com.projet.Formations.controllers;

import com.projet.Formations.entities.Demande;
import com.projet.Formations.service.DemandeService;
//import com.projet.Formations.service.FormationService;

//import org.aspectj.weaver.Lint;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;


@Controller
public class DemandeController {
    @Autowired
	DemandeService demService ;
	//@Autowired
	//UserService userService;
	@RequestMapping("/ListeDemandes")
	
	public String listeDemandes(
			ModelMap modelMap,
			@RequestParam(name = "page", defaultValue = "0") int page,
			@RequestParam(name = "size", defaultValue = "3") int size
			) {
		
			Page<Demande> prods = demService.getAllDemandesparpage(page, size);
				modelMap.addAttribute("Demandes", prods);

			modelMap.addAttribute("pages", new int[prods.getTotalPages()]);
			modelMap.addAttribute("currentPage", page);
		
		return "ListeDemandes"; 
}
}
