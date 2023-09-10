/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.orders;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import jp.co.nextdesign.domain.customers.Customer;
import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 注文
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
@Table(name="OrderTbl")
public class Order extends DdBaseEntity {
	
	private static final long serialVersionUID = 1L;

	/** 注文番号 */
	private String orderNumber;
	
	/** 注文者（お客様） */
	@ManyToOne
	private Customer customer;
	
	/** 注文明細リスト */
	@OneToMany(mappedBy="order", cascade=CascadeType.ALL, orphanRemoval=true)
	private List<OrderLine> orderLines;
	
	/** コンストラクタ */
	public Order(){
		super();
		this.orderLines = new ArrayList<OrderLine>();
	}

	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return this.getOrderNumber() != null ? this.getOrderNumber() : "";
	}

	public String getOrderNumber() {
		return orderNumber;
	}

	public void setOrderNumber(String orderNumber) {
		this.orderNumber = orderNumber;
	}

	public Customer getCustomer() {
		return customer;
	}

	public void setCustomer(Customer customer) {
		this.customer = customer;
	}

	public List<OrderLine> getOrderLines() {
		return orderLines;
	}

	public void setOrderLines(List<OrderLine> orderLines) {
		this.orderLines = orderLines;
	}
}
