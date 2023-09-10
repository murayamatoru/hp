/*
 * モデル例
 */
package jp.co.nextdesign.domain;

import javax.persistence.Entity;
import javax.persistence.ManyToOne;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 版
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 * @author murayama
 *
 */
@Entity
public class Edition extends DdBaseEntity {
	private static final long serialVersionUID = 1L;

	/** 版番号 */
	private Integer editionNumber;
	
	/** 版名 */
	private String name;
	
	/** 書籍 */
	@ManyToOne
	//@JoinColumn(name="book_id") //省略可
	private Book book;

	/** 書籍 */
	@ManyToOne
	//@JoinColumn(name="book_id") //省略可
	private Book book2;

	public Edition(){
		super();
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public Integer getEditionNumber() {
		return editionNumber;
	}

	public void setEditionNumber(Integer editionNumber) {
		this.editionNumber = editionNumber;
	}

	public Book getBook() {
		return book;
	}

	//Book#addEdition,removeEditionから使用する
	public void setBook(Book book) {
		this.book = book;
	}	

	public Book getBook2() {
		return book2;
	}

	public void setBook2(Book book2) {
		this.book2 = book2;
	}

	@Override
	public String getDDBEntityTitle(){
		return this.name;
	}

	/** debug */
	public String getDebugInfo(){
		String info = "<" + this.getClass().getSimpleName() + ">";
		info += "\neditionNumber=" + this.getEditionNumber();
		info += "\n</" + this.getClass().getSimpleName() + ">";
		return info;
	}
}
