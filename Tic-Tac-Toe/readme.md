# Tic-Tac-Toe
Design an algorithm to figure out if someone has won a game of tic-tac-toe. Input is a string array of size N x N, including characters " ", "X" and "O", where " " represents a empty grid.

The rules of tic-tac-toe are as follows:

- Players place characters into an empty grid(" ") in turn.
- The first player always place character "O", and the second one place "X".
- Players are only allowed to place characters in empty grid. Replacing a character is not allowed.
- If there is any row, column or diagonal filled with N same characters, the game ends. The player who place the last charater wins.
- When there is no empty grid, the game ends.
- If the game ends, players cannot place any character further.
If there is any winner, return the character that the winner used. If there's a draw, return "Draw". If the game doesn't end and there is no winner, return "Pending".

Example 1:
```
Input:  board = ["O X"," XO","X O"]
Output:  "X"
```
Example 2:
```
Input:  board = ["OOX","XXO","OXO"]
Output:  "Draw"
Explanation:  no player wins and no empty grid left
```
Example 3:
```
Input:  board = ["OOX","XXO","OX "]
Output:  "Pending"
Explanation:  no player wins but there is still a empty grid
```
Note:

- `1 <= board.length == board[i].length <= 100`
- Input follows the rules.

## Reference
- [Tic-Tac-Toe LCCI](https://leetcode-cn.com/problems/tic-tac-toe-lcci)