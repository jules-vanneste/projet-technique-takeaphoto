package com.takeaphoto.model;

/**
 * Mod�le pour un utilisateur
 * @author Maxime & Jules
 *
 */
public class User {
	private String userId;
	private String userName;

	public User() {
	}

	public User(String userId, String userName) {
		this.userId = userId;
		this.userName = userName;
	}

	public void setId(String userId) {
		this.userId = userId;
	}

	public String getUserName() {
		return userName;
	}

	public void setUserName(String userName) {
		this.userName = userName;
	}

	public String getUserId() {
		return userId;
	}

	@Override
	public String toString() {
		return "User [userId=" + userId + ", userName=" + userName + "]";
	}
}
