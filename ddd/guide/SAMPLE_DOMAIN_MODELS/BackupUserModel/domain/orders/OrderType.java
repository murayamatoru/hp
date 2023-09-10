/*
 * 例
 */
package jp.co.nextdesign.domain.orders;

/**
 * 注文種別
 * @author murayama
 *
 */
public enum OrderType {
	NORMAL("日本語"),
	SPECIAL("英語");

	private String fullName;
	private OrderType(String fullName){
		this.fullName = fullName;
	}

	@Override
	public String toString(){
		return this.fullName;
	}
}
