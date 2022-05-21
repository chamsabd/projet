package com.projet.Formations.controllers;

import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import com.projet.Formations.entities.Formation;
import com.projet.Formations.service.FormationService;
import com.projet.Formations.service.UserService;

@Controller
public class FormationController {
	@Autowired
	FormationService formationService;
	@Autowired
	UserService userService;
	@RequestMapping("/ListeFormations")
	public String listeFormations(
			ModelMap modelMap,
			@RequestParam(name = "page", defaultValue = "0") int page,
			@RequestParam(name = "size", defaultValue = "3") int size,
			@RequestParam(name = "nom", defaultValue = "") String nom) {
		if (nom == "") {
			Page<Formation> prods = formationService.getAllFormationsparpage(page, size);
			List<Formation> prod = formationService.getAllFormations();
			modelMap.addAttribute("scFormations", prod);
			modelMap.addAttribute("Formations", prods);

			modelMap.addAttribute("pages", new int[prods.getTotalPages()]);
			modelMap.addAttribute("currentPage", page);
		} else {
			Page<Formation> prods = formationService.findByTitreFormationContains(nom,
					PageRequest.of(page, size).toOptional().get());

			List<Formation> prod = formationService.getAllFormations();
			modelMap.addAttribute("scFormations", prod);
			modelMap.addAttribute("Formations", prods);
			modelMap.addAttribute("pages", new int[prods.getTotalPages()]);
			modelMap.addAttribute("currentPage", page);
			modelMap.addAttribute("nom", nom);
		}
		return "ListeFormations";
	}

	@RequestMapping("/showCreateFormation")
	public String showCreate(ModelMap modelMap, @RequestParam(name = "etat") String etat) {
		modelMap.addAttribute("responsables", userService.getAllResponsables());
		modelMap.addAttribute("formation", new Formation());
		modelMap.addAttribute("etat", etat);
		return "createFormation";
	}

	@RequestMapping("/saveFormation")
	public String saveProduit(@Valid Formation formation,
			BindingResult bindingResult,
			ModelMap modelMap) {
		modelMap.addAttribute("etat", "create");
		modelMap.addAttribute("responsables", userService.getAllResponsables());
	
		if (bindingResult.hasErrors()) {

			return "createFormation";
		}
		Formation saveFormation = formationService.saveFormation(formation);
		String msg = "Formation enregistré avec Id " +
				saveFormation.getIdFormation();
				modelMap.addAttribute("formation", new Formation());
		modelMap.addAttribute("msg", msg);
		return "createFormation";
	}

	@RequestMapping("/modifierFormation")
	public String editerProduit(@RequestParam(name = "id") Long id,
			@RequestParam(name = "page", defaultValue = "0") int page,
			@RequestParam(name = "size", defaultValue = "3") int size, ModelMap modelMap,
			@RequestParam(name = "etat") String etat) {
		Formation f = formationService.getFormation(id);

		modelMap.addAttribute("etat", etat);
		modelMap.addAttribute("responsables", userService.getAllResponsables());
		
		modelMap.addAttribute("formation", f);
		modelMap.addAttribute("page", page);
		modelMap.addAttribute("size", size);
		return "createFormation";
	}

	@RequestMapping("/updateFormation")
	public String updateProduit(@Valid Formation formation,
			BindingResult bindingResult,
			ModelMap modelMap, @RequestParam(name = "page", defaultValue = "0") int page,
			@RequestParam(name = "size", defaultValue = "3") int size, RedirectAttributes redirectAttributes) {
		if (bindingResult.hasErrors()) {
			modelMap.addAttribute("etat", "update");
			modelMap.addAttribute("responsables", userService.getAllResponsables());
	
			return "createFormation";
		}
		formationService.updateFormation(formation);
		Page<Formation> prods = formationService.getAllFormationsparpage(page, size);
		modelMap.addAttribute("Formations", prods);
		modelMap.addAttribute("pages", new int[prods.getTotalPages()]);
		modelMap.addAttribute("currentPage", page);
		modelMap.addAttribute("size", size);
		//
		// redirectAttributes.addAttribute("currentPage",page);
		// redirectAttributes.addAttribute("size", size);
		return "listeFormations";
	}
}
