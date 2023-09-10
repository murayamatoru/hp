/*
 * モデル例
 */
package jp.co.nextdesign.domain.store;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.ManyToMany;

import jp.co.nextdesign.domain.Book;
import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 書店
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 * @author murayama
 *
 */
@Entity
public class Store extends DdBaseEntity {
	private static final long serialVersionUID = 1L;
	
	/** 書店名 */
	private String name;
	
	/** 書籍リスト */
	@ManyToMany(mappedBy="storeList", fetch=FetchType.EAGER)
	private List<Book> bookList;

//	/** 書籍リスト Book側のコメントを参照 */
//	@ManyToMany(mappedBy="storeList2")
//	private List<Book> bookList2;

	/** コンストラクタ */
	public Store(){
		super();
		this.name = "";
		this.bookList = new ArrayList<Book>();
//		this.bookList2 = new ArrayList<Book>();
	}

	/** DDBのviewが使用する */
	@Override
	public String getDDBEntityTitle(){
		return this.name;
	}
	
	//ManyToManyで双方向関連を維持するためのaddStore,removeStoreを含む。owning側ではなくmappedBy側から使用するが、両側に実装する。
	public List<Book> getBookList() {
		return bookList;
	}
	public void setBookList(List<Book> bookList) {
		this.bookList = bookList;
	}
	public void addBook(Book book){
		if (book != null && !this.bookList.contains(book)){
			this.bookList.add(book);
			book.addStore(this);
		}
	}
	public void removeBook(Book book){
		if (book != null && this.bookList.contains(book)){
			this.bookList.remove(book);
			book.removeStore(this);
		}
	}

	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}

	/** debug */
	public String getDebugInfo(){
		String info = "<" + this.getClass().getSimpleName() + ">";
		info += "\nname=" + this.getName();
		info += "\n</" + this.getClass().getSimpleName() + ">";
		return info;
	}
}
