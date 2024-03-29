package com.projet.Formations.security;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.authentication.AuthenticationProvider;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.AuthenticationException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.web.access.AccessDeniedHandler;
import org.springframework.security.web.access.AccessDeniedHandlerImpl;

import org.springframework.security.web.authentication.SimpleUrlAuthenticationFailureHandler;
import org.springframework.security.web.authentication.SimpleUrlAuthenticationSuccessHandler;
import org.springframework.security.web.authentication.logout.SimpleUrlLogoutSuccessHandler;
import org.springframework.web.util.UrlPathHelper;

import com.projet.Formations.service.UserService;


@Configuration
@EnableWebSecurity
public class SecurityConfig extends WebSecurityConfigurerAdapter { 
	public static final String AUTHORITIES_CLAIM_NAME = "roles";
@Autowired
 UserService userDetailsService; 
//@Autowired
//private AccessDeniedHandler accessDeniedHandler;

@Override
protected void configure(AuthenticationManagerBuilder auth) throws Exception { 
 auth.userDetailsService(userDetailsService); 
 } 
@Override
protected void configure(HttpSecurity http) throws Exception { 
 
http.csrf().disable() 
.authenticationProvider(getProvider()) 

.formLogin()
.loginPage("/login")
.loginProcessingUrl("/login")
	.successHandler(new AuthentificationLoginSuccessHandler()) 
		.failureHandler( new AuthentificationLoginFailureHandler())
		.and()	
.logout() 
.logoutUrl("/logout") 
.logoutSuccessHandler(new AuthentificationLogoutSuccessHandler()) 
.invalidateHttpSession(true) 
.and() 
.authorizeRequests() 
.antMatchers("/login").permitAll() 
.antMatchers("/register").permitAll()
.antMatchers("/webjars/**").permitAll()
.antMatchers("/logout").permitAll() ;

 
		 http.authorizeRequests().antMatchers("/ListeFormations","/sendDemande","/listeDemandes","/accepterDemande","/refuserDemande")
		 .hasAnyAuthority("ADMIN","USER"); 
		 http.authorizeRequests() 
		 .antMatchers("/showCreateFormation","/saveFormation","/modifierFormation","/updateFormation","/ListeFormateurex","/showCreate","/saveFormateurex","/supprimerFormateurex","/modifierFormateurex","/updateFormateurex") 
		 .hasAnyAuthority("ADMIN")
		.anyRequest().authenticated(); 
		 http.exceptionHandling().accessDeniedPage("/accessDenied");
	
		 

} 
private class AuthentificationLoginFailureHandler extends SimpleUrlAuthenticationFailureHandler{

	@Override
	public void onAuthenticationFailure(HttpServletRequest request, HttpServletResponse response,
			AuthenticationException exception) throws IOException, ServletException {
		UrlPathHelper help =new UrlPathHelper();
		String path=help.getContextPath(request);
		response.sendRedirect(path +"/login?error=true");
	}
	
}

private class AuthentificationLoginSuccessHandler extends
SimpleUrlAuthenticationSuccessHandler {

	@Override
	public void onAuthenticationSuccess(HttpServletRequest request, HttpServletResponse response,
			Authentication authentication) throws IOException, ServletException {
		
		response.setStatus(HttpServletResponse.SC_OK); 
		UrlPathHelper help =new UrlPathHelper();
		String path=help.getContextPath(request);
		response.sendRedirect(path +"/ListeFormations");
	}

	


} 
private class AuthentificationLogoutSuccessHandler extends SimpleUrlLogoutSuccessHandler { 
@Override
public void onLogoutSuccess(HttpServletRequest request, HttpServletResponse response, Authentication  authentication) throws IOException, ServletException { 
response.setStatus(HttpServletResponse.SC_OK); 
UrlPathHelper help =new UrlPathHelper();
String path=help.getContextPath(request);
response.sendRedirect(path +"/login");
} 
} 
@Bean
public AuthenticationProvider getProvider() { 
AppAuthProvider provider = new AppAuthProvider(); 
provider.setUserDetailsService(userDetailsService); 
return provider; 
} 
@Bean
public PasswordEncoder passwordEncoder () { 
return new BCryptPasswordEncoder(); 
} 
@Bean
public AccessDeniedHandler accessDeniedHandler(){ 
return new AccessDeniedHandlerImpl(); 
} 
} 