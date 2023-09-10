/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.customers;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;

import jp.co.nextdesign.domain.Address;
import jp.co.nextdesign.domain.ddb.DdBaseEntity;
import jp.co.nextdesign.domain.orders.Order;

/**
 * お客様
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Customer extends DdBaseEntity {
	
	private static final long serialVersionUID = 1L;
	
	/** 名 */
	private String firstName;
	
	/** 姓 */
	private String familyName;

	/** 住所 */
	@OneToOne(cascade=CascadeType.ALL)
	@JoinColumn(name="address_id") //自分の列
	private Address address;
	
	/** 登録日 */
	private Date registrationDate;
	
	/** 注文リスト */
	@OneToMany(mappedBy="customer", cascade=CascadeType.ALL, orphanRemoval=true)
	List<Order> orders;
	
	/** コンストラクタ */
	public Customer(){
		this.orders = new ArrayList<Order>();
	}

	/** 姓名を応答する */
	public String getFullName(){
		return this.getFamilyName() + " " + this.getFirstName();
	}
	
	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return this.getFullName();
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getFamilyName() {
		return familyName;
	}

	public void setFamilyName(String familyName) {
		this.familyName = familyName;
	}

	public Address getAddress() {
		return address;
	}

	public void setAddress(Address address) {
		this.address = address;
	}

	public Date getRegistrationDate() {
		return registrationDate;
	}

	public void setRegistrationDate(Date registrationDate) {
		this.registrationDate = registrationDate;
	}

	public List<Order> getOrders() {
		return orders;
	}

	public void setOrders(List<Order> orders) {
		this.orders = orders;
	}
}
