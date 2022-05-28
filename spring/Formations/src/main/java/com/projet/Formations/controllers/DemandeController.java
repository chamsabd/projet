package com.projet.Formations.controllers;

import java.util.Date;
import java.util.Optional;

import com.projet.Formations.dao.DemandeRepository;
import com.projet.Formations.dao.FormationRepository;
import com.projet.Formations.entities.Demande;
import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.User;
import com.projet.Formations.service.DemandeService;
//import com.projet.Formations.service.FormationService;
//import com.projet.Formations.service.FormationService;
import com.projet.Formations.service.UserService;

//import org.aspectj.weaver.Lint;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
//import org.springframework.data.domain.Page;
import org.springframework.security.core.annotation.AuthenticationPrincipal;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
//import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;


@Controller
public class DemandeController {
    @Autowired
	DemandeService demService ;
    @Autowired
	DemandeRepository demRep ;
	@Autowired
	UserService userService;
	@Autowired
	FormationRepository formationRepository;
	//FormationService fService;

	//@Autowired
	//UserService userService;
	@RequestMapping("/listeDemandes")
	//@GetMapping(value="/listeDemandes")
	public String listeDemandes(
			ModelMap modelMap,
			@RequestParam(name = "page", defaultValue = "0") int page,
			@RequestParam(name = "size", defaultValue = "3") int size
			) {
		
			Page<Demande> prods = demService.getAllDemandesparpage(page, size);
				modelMap.addAttribute("Demandes", prods);

			modelMap.addAttribute("pages", new int[prods.getTotalPages()]);
			modelMap.addAttribute("currentPage", page);
		

		return "redirect:/listeDemandes"; 
}
@RequestMapping("/SendDemande")
public String sendDemande(@RequestParam(name = "profile", defaultValue = "participant") String profile, @RequestParam(name = "id") Long idFormation,@AuthenticationPrincipal User user,RedirectAttributes redirectAttrs){
		Formation f= formationRepository.findByIdFormation(idFormation);
		Demande d=new Demande (new Date(),f,user);

	Optional<Demande> d1=demRep.findDemande(user,f);
	redirectAttrs.addAttribute("profile", profile);

if (d1.isPresent()==false){
	demRep.save(d);
	redirectAttrs.addFlashAttribute("msg", "demande  envoyee  avec succes");
}
return "redirect:/ListeFormations";

}


}



