/*
 * モデル例
 */
package jp.co.nextdesign.domain;

/**
 * 言語
 * @author murayama
 *
 */
public enum EnumLanguage {
	JA("日本語"),
	EN("英語");

	private String fullName;
	private EnumLanguage(String fullName){
		this.fullName = fullName;
	}

	@Override
	public String toString(){
		return this.fullName;
	}
}
