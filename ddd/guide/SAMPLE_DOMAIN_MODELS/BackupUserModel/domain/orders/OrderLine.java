/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.orders;

import javax.persistence.Entity;
import javax.persistence.ManyToOne;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;
import jp.co.nextdesign.domain.products.Product;

/**
 * 注文明細
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class OrderLine extends DdBaseEntity {
	private static final long serialVersionUID = 1L;

	/** 商品 */
	@ManyToOne
	private Product product;
	
	/** 注文 */
	@ManyToOne
	private Order order;
	
	/** コンストラクタ */
	public OrderLine(){
		super();
	}

	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return this.getProduct() != null ? this.getProduct().getDDBEntityTitle() : "";
	}

	public Product getProduct() {
		return product;
	}

	public void setProduct(Product product) {
		this.product = product;
	}

	public Order getOrder() {
		return order;
	}

	public void setOrder(Order order) {
		this.order = order;
	}
}
