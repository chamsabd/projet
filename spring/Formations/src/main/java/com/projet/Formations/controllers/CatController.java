package com.projet.Formations.controllers;

import java.text.ParseException;
import java.util.List;

import com.projet.Formations.entities.formateurex;
import com.projet.Formations.service.FormateurexService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;


@Controller
public class CatController {
	
	@Autowired
	 FormateurexService formateurexService; 
	
	@RequestMapping("/showCreate")
	public String showCreate()
	 {
	 return "createFormateurex";
	 }
	
	
	@RequestMapping("/saveFormateurex")
	public String saveFormateurex(@ModelAttribute("formateurex") formateurex formateurex,ModelMap modelMap) throws ParseException
	 {
	formateurex saveFormateurex = formateurexService.saveFormateurex(formateurex);
	 String msg ="formateur externe enregistré avec Id "+saveFormateurex.getIdFormateurex();
	 modelMap.addAttribute("msg", msg);
	 return "createFormateurex";
	 } 
	
	
	@RequestMapping("/ListeFormateurex")
	public String listeProduits(ModelMap modelMap,
	@RequestParam(name = "page", defaultValue = "0") int page,
	@RequestParam(name = "size", defaultValue = "2") int size) 
	 {
	 Page<formateurex> forms = formateurexService.getAllFormateurexParPage(page, size);
	 modelMap.addAttribute("formateurex", forms);
	 modelMap.addAttribute("pages", new int[forms.getTotalPages()]);
	 modelMap.addAttribute("currentPage", page); 
	 return "listeFormateurex";
	 } 
	
	@RequestMapping("/supprimerFormateurex")
	public String supprimerFormateurex(@RequestParam("id") Long id, ModelMap modelMap,
			@RequestParam(name = "page", defaultValue = "0") int page,
			 @RequestParam(name = "size", defaultValue = "2") int size)
	 {
		formateurexService.deleteFormateurexById(id);
		Page<formateurex> forms= formateurexService.getAllFormateurexParPage(page, size);
	//formateurex f= new formateurex();
	// f.setIdFormateurex(id);
	// formateurexService.deleteFormateurex(f);
	// List<formateurex> forms = formateurexService.getAllFormateurex();
	 modelMap.addAttribute("formateurex", forms);
	 modelMap.addAttribute("pages", new int[forms.getTotalPages()]);
	 modelMap.addAttribute("currentPage", page);
	 modelMap.addAttribute("size", size);
	 return "listeFormateurex";
	 }
	
	
	
	@RequestMapping("/modifierFormateurex")
	public String editerFormateurex(@RequestParam("id") Long id,ModelMap modelMap,
			   @RequestParam(name = "page", defaultValue = "0") int page, 
		          @RequestParam(name = "size", defaultValue = "2") int size)
	 {
	 formateurex f= formateurexService.getFormateurex(id);
	 modelMap.addAttribute("formateurex", f);
	  modelMap.addAttribute("page", page); 
	  modelMap.addAttribute("size", size);
	 return "editerFormateurex";
	 }
	@RequestMapping("/updateFormateurex")
	public String updateFormateurex(@ModelAttribute("formateurex") formateurex formateurex,
	 ModelMap modelMap,   
	 @RequestParam(name = "page", defaultValue = "0") int page, 
     @RequestParam(name = "size", defaultValue = "2") int size) throws ParseException
	 {
		formateurexService.updateFormateurex(formateurex);
	 Page<formateurex> forms = formateurexService.getAllFormateurexParPage(page, size);
	 modelMap.addAttribute("formateurex", forms);
	 modelMap.addAttribute("pages", new int[forms.getTotalPages()]); 
     modelMap.addAttribute("currentPage", page); 
     modelMap.addAttribute("size", size);
	 return "listeFormateurex";
	 }


}
