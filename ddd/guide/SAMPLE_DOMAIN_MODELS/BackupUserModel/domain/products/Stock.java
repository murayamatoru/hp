/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.products;

import java.util.Calendar;
import java.util.Date;

import javax.persistence.Entity;
import javax.persistence.ManyToOne;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 在庫
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Stock extends DdBaseEntity {
	private static final long serialVersionUID = 1L;
	
	/** 数量 */
	private Integer quantity;
	
	/** 商品 */
	@ManyToOne
	private Product product;
	
	/** 倉庫 */
	@ManyToOne
	private Warehouse warehouse;
	
	/** コンストラクタ */
	public Stock(){
		super();
	}
	
	/**
	 * 次月の入庫予定日を応答する
	 * @return 次月の入庫予定日
	 */
	public Date getNextMonthWarehousingDate(){
		Date result = Calendar.getInstance().getTime();
		//何らかの実装
		return result;
	}
	
	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		String result = "商品=";
		result += this.getProduct() != null ? this.getProduct().getProductName() : "";
		result += " 倉庫=";
		result += this.getWarehouse() != null ? this.getWarehouse().getName() : "";
		result += " 数量=" + this.getQuantity();
		return result;
	}
	public Integer getQuantity() {
		return quantity;
	}
	public void setQuantity(Integer quantity) {
		this.quantity = quantity;
	}
	public Product getProduct() {
		return product;
	}
	public void setProduct(Product product) {
		this.product = product;
	}
	public Warehouse getWarehouse() {
		return warehouse;
	}
	public void setWarehouse(Warehouse warehouse) {
		this.warehouse = warehouse;
	}	
}
