package com.projet.Formations.service;

import java.util.List;

import com.projet.Formations.entities.formateurex;

import org.springframework.data.domain.Page;



public interface FormateurexService {
	
	formateurex saveFormateurex(formateurex f);
	formateurex updateFormateurex(formateurex f);
	void deleteFormateurex(formateurex f);
	void deleteFormateurexById(Long id);
	 formateurex getFormateurex(Long id);
	 List<formateurex> getAllFormateurex();
	 Page<formateurex> getAllFormateurexParPage(int page, int size); 

}
