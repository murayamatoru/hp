/*
 * モデル例
 */
package jp.co.nextdesign.domain;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.OneToMany;
import javax.persistence.Transient;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 著者
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 * @author murayama
 *
 */
@Entity
public class Author extends DdBaseEntity {
	private static final long serialVersionUID = 1L;

	/** 名前 */
	private String name;
	
	/** 書籍リスト owning/parent */
	@OneToMany(mappedBy="author", cascade=CascadeType.ALL, orphanRemoval=true)
	private List<Book> bookList;

	/** 書籍リスト owning/parent */
	@OneToMany(mappedBy="author2", cascade=CascadeType.ALL, orphanRemoval=true)
	private List<Book> bookList2;

	/** コンストラクタ */
	public Author(){
		super();
		this.name = "---";
		this.bookList = new ArrayList<Book>();
		this.bookList2 = new ArrayList<Book>();
	}
	
	//OneToManyで双方向関連を維持するためのコードを含むgetBookList(),setBookList(List<Book> bookList)の例
	@Transient
	private ArrayList<Book> latestBookList = new ArrayList<Book>();
	public List<Book> getBookList() {
		return this.bookList;
	}
	public void setBookList(List<Book> bookList) {
		for(Book newBook : bookList){
			if (!latestBookList.contains(newBook)){
				newBook.setAuthor(this);
			}
		}
		for(Book oldBook : latestBookList){
			if (!bookList.contains(oldBook)){
				oldBook.setAuthor(null);
			}
		}
		this.bookList = bookList;
		latestBookList = new ArrayList<Book>(this.bookList);
	}

	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public List<Book> getBookList2() {
		return bookList2;
	}
	public void setBookList2(List<Book> bookList2) {
		this.bookList2 = bookList2;
	}
	
	@Override
	public String getDDBEntityTitle(){
		return this.name;
	}
	
	/** debug */
	public String getDebugInfo(){
		String info = "<" + this.getClass().getSimpleName() + ">";
		info += "\nname=" + this.getName();
		info += "\n</" + this.getClass().getSimpleName() + ">";
		return info;
	}
}
