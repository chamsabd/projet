package com.projet.Formations.controllers;

import java.util.Date;
import java.util.Optional;

import javax.mail.internet.MimeMessage;
import javax.validation.Valid;

import com.projet.Formations.dao.DemandeRepository;
import com.projet.Formations.dao.FormationRepository;
import com.projet.Formations.entities.Demande;
import com.projet.Formations.entities.Formation;
import com.projet.Formations.entities.Inscrit;
import com.projet.Formations.entities.User;
import com.projet.Formations.service.DemandeService;
import com.projet.Formations.service.FormationService;
import com.projet.Formations.service.InscritService;
//import com.projet.Formations.service.FormationService;
//import com.projet.Formations.service.FormationService;
import com.projet.Formations.service.UserService;

//import org.aspectj.weaver.Lint;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.mail.javamail.MimeMessageHelper;
//import org.springframework.data.domain.Page;
import org.springframework.security.core.annotation.AuthenticationPrincipal;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
//import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;


@Controller
public class DemandeController {
    @Autowired
	DemandeService demService ;
	@Autowired
	InscritService inscritService ;
    @Autowired
	DemandeRepository demRep ;
	@Autowired
	UserService userService;
	@Autowired
	FormationRepository formationRepository;
	@Autowired
	FormationService formationService;
    @Autowired
    private JavaMailSender sender;
	//FormationService fService;

	//@Autowired
	//UserService userService;
	@RequestMapping("/listeDemandes")
	//@GetMapping(value="/listeDemandes")
	public String listeDemandes(
			ModelMap modelMap,
			@RequestParam(name = "id") Long id_form,

			@RequestParam(name = "page", defaultValue = "0") int page,
			@RequestParam(name = "size", defaultValue = "3") int size,
			@AuthenticationPrincipal User user
			) {
			
				Formation f= formationRepository.findByIdFormation(id_form);
				if((f == null) ){

					
				//	System.out.println(f.getResponsable().getIdUser()!=user.getIdUser())	;	
						//System.out.println(f.getResponsable());
							return "redirect:/accessDenied";
						}
						if( f.getResponsable().getIdUser()-user.getIdUser()!=0L){

							//System.out.println(f.getResponsable().getIdUser()-user.getIdUser()==0L)	;

							return "redirect:/accessDenied";
						}
						 
				
			
			Page<Demande> prods = demService.getAllDemandesparpage(f,page, size);
				modelMap.addAttribute("demandes", prods);
				modelMap.addAttribute("id",id_form);
			modelMap.addAttribute("pages", new int[prods.getTotalPages()]);
			modelMap.addAttribute("currentPage", page);
		

		return "listeDemandes"; 
}
@RequestMapping("/SendDemande")
public String sendDemande(@RequestParam(name = "profile", defaultValue = "participant") String profile, @RequestParam(name = "id") Long idFormation,@AuthenticationPrincipal User user,RedirectAttributes redirectAttrs){
		Formation f= formationRepository.findByIdFormation(idFormation);
		if(f==null)
		return "redirect:/accessDenied";

		Demande d=new Demande (new Date(),f,user);

	Optional<Demande> d1=demRep.findDemande(user,f);
	redirectAttrs.addAttribute("profile", profile);

if (d1.isPresent()==false){
	demRep.save(d);
	redirectAttrs.addFlashAttribute("msg", "demande  envoyee  avec succes");
}
else{
	if (d1.get().getAccepted()==true) {
		redirectAttrs.addFlashAttribute("msg", "demande deja accepter");

	} else {
		redirectAttrs.addFlashAttribute("msg", "demande deja envoyer");

	}
}


return "redirect:/ListeFormations";

}
@RequestMapping("/accepterDemande")
public String accepterDemande( @RequestParam(name = "id") Long id,RedirectAttributes redirectAttrs,@AuthenticationPrincipal User user){
Demande d=demRep.findByIdDemande(id);
Formation f= d.getFormation();
		
			
							if( f.getResponsable().getIdUser()-user.getIdUser()!=0L){
	
								//System.out.println(f.getResponsable().getIdUser()-user.getIdUser()==0L)	;
	
								return "redirect:/accessDenied";
							}

try {

	sendEmail(d.getUser().getUsername(),"félicitation votre demande au formation "+d.getFormation().getTitreFormation()+" a ete accepter aujourd'hui vous etes un participant","demande accepter");
} catch (Exception ex) {
	redirectAttrs.addFlashAttribute("msg", "l'email n'est pas envoyer car il n'existe pas");
	return "redirect:/listeDemandes";

}
if (d.getFormation().getNbrPlace()>0) {
	//d.setFormation(d.getFormation())
	d.setAccepted(true);
	Inscrit i=new Inscrit(d.getUser(),d.getFormation(),new Date());
	inscritService.saveInscrit(i);


System.out.println(f.getNbrPlace());
formationRepository.setNbrPlaceById(f.getNbrPlace()-1,f.getIdFormation());
	
redirectAttrs.addFlashAttribute("msg", "l'email envoyer");

}
else
redirectAttrs.addFlashAttribute("msg", "il n'y a pa plus de place dans la formation");

redirectAttrs.addAttribute("id", d.getFormation().getIdFormation());

	return "redirect:/listeDemandes";
}




@RequestMapping("/refuserDemande")
public String refuserDemande( @RequestParam(name = "id") Long id,RedirectAttributes redirectAttrs,@AuthenticationPrincipal User user){
	Demande d=demRep.findByIdDemande(id);
	Formation f= d.getFormation();
	if( f.getResponsable().getIdUser()-user.getIdUser()!=0L){
	
		//System.out.println(f.getResponsable().getIdUser()-user.getIdUser()==0L)	;

		return "redirect:/accessDenied";
	}


try {
	sendEmail(d.getUser().getUsername(),"desoler votre demande au formation "+d.getFormation().getTitreFormation()+"est refuser","demande refuser");
} catch (Exception ex) {
	redirectAttrs.addFlashAttribute("msg", "l'email n'est pas envoyer car il n'existe pas");
	return "redirect:/listeDemandes";
}
demService.deleteDemandeparid(id);
	redirectAttrs.addAttribute("id", d.getFormation().getIdFormation());
	redirectAttrs.addFlashAttribute("msg", "l'email envoyer");
	return "redirect:/listeDemandes";
}
@RequestMapping("/simpleemail3")
    @ResponseBody
    String home() {
        try {
            sendEmail("gdd","String text","String subject");
            return "Email Sent!";
        } catch (Exception ex) {
            return "Error in sending email: " + ex;
        }
    }
private void sendEmail(String email,String text,String subject) throws Exception{
	MimeMessage message = sender.createMimeMessage();
	MimeMessageHelper helper = new MimeMessageHelper(message);
	 
	helper.setTo(email);
	helper.setText(text);
	helper.setSubject(subject);
	 
	sender.send(message);
}

}



