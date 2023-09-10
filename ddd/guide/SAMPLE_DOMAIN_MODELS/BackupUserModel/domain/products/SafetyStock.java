/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.products;

import javax.persistence.Entity;
import javax.persistence.ManyToOne;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 安全在庫
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class SafetyStock extends DdBaseEntity {
	private static final long serialVersionUID = 1L;
	
	/** 対象月 */
	private Integer month;
	
	/** 数量 */
	private Integer quantity;
	
	/** 商品 */
	@ManyToOne
	private Product product;

	/** コンストラクタ */
	public SafetyStock(){
		super();
	}

	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return "商品=" + this.getProduct().getProductName() + 
				" 対象月=" + this.getMonth() +
				" 数量=" + this.getQuantity();
	}

	public Integer getMonth() {
		return month;
	}

	public void setMonth(Integer month) {
		this.month = month;
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

}
