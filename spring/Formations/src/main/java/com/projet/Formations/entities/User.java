package com.projet.Formations.entities;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.Collection;
import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.OneToMany;
import javax.validation.constraints.*;

import org.hibernate.validator.constraints.Length;
import org.hibernate.validator.constraints.Range;
import org.springframework.security.core.GrantedAuthority;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;


@Entity
public class User implements Serializable, UserDetails {
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY) // auto increment
	private Long idUser;
	
	@Email
	@Column(nullable=false,unique=true)
	private String username;
	@NotNull
	@Column(nullable=false)
	private String password;
	@Column(nullable=false,unique=true)
	@NotNull
	private int nCin;
	@NotNull
	@NotBlank(message = "nom is required")
	private String nom;
	@NotNull
	@NotBlank(message = "prenom is required")
	private String prenom;

	@NotNull
	private String role;
	@NotNull
	private String profile;

	@ManyToMany
	@JoinTable(name="Demande",
	joinColumns=@JoinColumn(name="idUser"),
	inverseJoinColumns =@JoinColumn(name="idFormation"))
	Collection<Formation> formations;
	@OneToMany(mappedBy = "responsable")
	private List<Formation> formation;
	public User() {
		super();
	
	}
	
	public User(@Email String username, @NotNull String password, @NotNull int nCin,
			@NotNull @NotBlank(message = "nom is required") String nom,
			@NotNull @NotBlank(message = "prenom is required") String prenom, @NotNull String role,
			@NotNull String profile) {
		this.username = username;
		this.password = password;
		this.nCin = nCin;
		this.nom = nom;
		this.prenom = prenom;
		this.role = role;
		this.profile = profile;
	}

	public String getProfile() {
		return profile;
	}

	public void setProfile(String profile) {
		this.profile = profile;
	}

	public User(@Email String username, String password, int nCin, String nom, String prenom, String role) {
		super();
		this.username = username;
		this.password = password;
		this.nCin = nCin;
		this.nom = nom;
		this.prenom = prenom;
		this.role = role;
	}

	public String getRole() {
		return role;
	}

	public void setRole(String role) {
		this.role = role;
	}

	public List<Formation> getFormation() {
		return formation;
	}

	public void setFormation(List<Formation> formation) {
		this.formation = formation;
	}

	public Long getIdUser() {
		return idUser;
	}

	public void setIdUser(Long idUser) {
		this.idUser = idUser;
	}

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public int getnCin() {
		return nCin;
	}

	public void setnCin(int nCin) {
		this.nCin = nCin;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getPrenom() {
		return prenom;
	}

	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}
	@Override
	public Collection<? extends GrantedAuthority> getAuthorities() {
		
		List<SimpleGrantedAuthority> authorities = new ArrayList<>(); 
		
		authorities.add(new SimpleGrantedAuthority(this.getRole())); 
		 return authorities; 
	}
	@Override
	public boolean isAccountNonExpired() {
		// TODO Auto-generated method stub
		return false;
	}
	@Override
	public boolean isAccountNonLocked() {
		// TODO Auto-generated method stub
		return false;
	}
	@Override
	public boolean isCredentialsNonExpired() {
		// TODO Auto-generated method stub
		return false;
	}
	@Override
	public boolean isEnabled() {
		// TODO Auto-generated method stub
		return false;
	}
	

}
