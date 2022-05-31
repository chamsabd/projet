package com.projet.Formations.service;

import java.util.List;

import com.projet.Formations.dao.FormateurexRepository;
import com.projet.Formations.entities.formateurex;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.PageRequest;
import org.springframework.stereotype.Service;


@Service
public class FormateurexServiceImpI implements FormateurexService{
	
	@Autowired
	 FormateurexRepository formateurexRepository; 

	@Override
	public formateurex saveFormateurex(formateurex f) {
		// TODO Auto-generated method stub
		return formateurexRepository.save(f);
	}

	@Override
	public formateurex updateFormateurex(formateurex f) {
		// TODO Auto-generated method stub
		return formateurexRepository.save(f);
	}

	@Override
	public void deleteFormateurex(formateurex f) {
		// TODO Auto-generated method stub
		formateurexRepository.delete(f);
		
	}

	@Override
	public void deleteFormateurexById(Long id) {
		// TODO Auto-generated method stub
		formateurexRepository.deleteById(id);
		
	}

	@Override
	public formateurex getFormateurex(Long id) {
		// TODO Auto-generated method stub
		return formateurexRepository.findById(id).get();
	}

	@Override
	public List<formateurex> getAllFormateurex() {
		// TODO Auto-generated method stub
		return formateurexRepository.findAll();
	}

	@Override
	public Page<formateurex> getAllFormateurexParPage(int page, int size) {
		// TODO Auto-generated method stub
		return formateurexRepository.findAll(PageRequest.of(page, size));
	}

}
