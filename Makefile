pr:
	gh pr create --base main --title "$(title)"
merge:
	gh pr merge $(id)