package com.projet.Formations.entities;

import java.util.Date;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import org.springframework.format.annotation.DateTimeFormat;


@Entity
public class Formation {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY) // auto increment
	private Long idFormation;
		private String titreFormation;
	private String description;
	@Temporal(TemporalType.DATE) 
	@DateTimeFormat(pattern = "yyyy-MM-dd")
	private Date dateDebut;
	@Temporal(TemporalType.DATE) 
	@DateTimeFormat(pattern = "yyyy-MM-dd")
	private Date dateFin;
	 
	private boolean etat;
	private int nbrPlace;
	private float prix;

	@OneToMany(mappedBy = "formation")
	private List<Demande> demandes;

	public Formation() {
		super();
		// TODO Auto-generated constructor stub
	}



}
