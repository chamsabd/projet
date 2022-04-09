package com.projet.Formations.entities;

import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class Formation {
	@Id //c'est id
	@GeneratedValue (strategy = GenerationType.IDENTITY) //auto increment 
	private Long idFormation; 
	private String nomFormation;
	private String description;
	private Date dateDebut;
	private Date dateFin;
	private Date dateCertif;
	private boolean etat;
	private int nbrPlace; 
}
