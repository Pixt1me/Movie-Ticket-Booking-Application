from flask import Flask, render_template, request
import sqlite3

app = Flask(__name__, template_folder='template')
db = 'tickets.db'

@app.route('/')
def home():
    return render_template('home.html')

@app.route('/book_ticket', methods=['GET', 'POST'])
def book_ticket():
    if request.method == 'POST':
        name = request.form['name']
        email = request.form['email']
        quantity = request.form['quantity']
        date = request.form['date']

        conn = sqlite3.connect(db)
        c = conn.cursor()

        c.execute('INSERT INTO tickets (name, email, quantity, date) VALUES (?, ?, ?, ?)',
                  (name, email, quantity, date))
        conn.commit()
        conn.close()

        return render_template('success.html')
    else:
        return render_template('book_ticket.html')
if __name__ == '__main__':
    app.run(debug=True)